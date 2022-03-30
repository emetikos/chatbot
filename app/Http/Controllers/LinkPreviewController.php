<?php

namespace App\Http\Controllers;

use App\Models\PythonModel;
use DOMDocument;
use DOMElement;
use DOMNodeList;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


/**
 * The LinkPreviewController retrieves data from a URL that will be used to
 * display links to the user related to their searched topic.
 *
 * @author   Mark Rigden
 * @version  1.0
 * @since    1.0
 */
class LinkPreviewController extends Controller {

    /**
     * Gets the preview data from the given URL in $_POST["url"].
     *
     * If the data is unable to be retrived, null will be returned.
     *
     * @param Request $request  the http request sent
     * @return array|null       the data, or null
     */
    public static function getLinkPreviewData(Request $request) : ?array {
        $url = $_POST["url"] ?? null;

        if (empty($url)) {
            return null;
        }

        $domain = parse_url($url, PHP_URL_SCHEME) . "://" . parse_url($url, PHP_URL_HOST);
        $html   = LinkPreviewController::getWebpage($url);
        $dom    = new DOMDocument();
        $icon   = null;
        $title  = null;

        if (!empty($html)) {
            try {
                // Ignore errors while parsing the HTML
                error_reporting(0);
                $dom->loadHTML($html);
                // Un-ignore errors
                error_reporting(E_ALL);

                $icon  = LinkPreviewController::getIcon($domain, $dom->getElementsByTagName("link"));
                $title = LinkPreviewController::getTitle($dom->getElementsByTagName("title")->item(0));
            } catch (Exception $e) {

            }
        }

        return ["icon"=>$icon, "title"=> $title];
    }

    /**
     * Gets the HTML from the given URL.
     *
     * If the webpage does not return a 200 status code, null will be returned.
     *
     * @param string $url   the URL of the webpage
     * @return string|null  the html of the webpage, or null
     */
    private static function getWebpage(string $url) : ?string {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        // Simulate a browser accessing the webpage
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $html         = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return ($responseCode === 200) ? $html : null;
    }

    /**
     * Gets the URL of the webpage's icon, or null if it could not be found.
     *
     * @param string $domain         the domain of the webpage (e.g. https://example.com/)
     * @param DOMNodeList $elements  the list of link elements
     * @return string|null           the URL of the icon, or null
     */
    private static function getIcon(string $domain, DOMNodeList $elements) : ?string {
        foreach ($elements as $linkTag) {
            $rel  = $linkTag->getAttribute("rel");
            $href = $linkTag->getAttribute("href");

            if (str_contains($rel, "icon") && !empty($href)) {
                if (str_starts_with($href, "http://")
                    || str_starts_with($href, "https://")) {

                    $icon = $href;
                } else {
                    $icon = $domain . $href;
                }

                return $icon;
            }
        }

        return null;
    }

    /**
     * Gets the title of webpage, or null if an empty string was found.
     *
     * In some cases, cloudfare will be being used, so if the title is
     * "Just a moment...", null will be returned.
     *
     * @param DOMElement $element  the title element
     * @return string|null         the text from the title element, or null
     */
    private static function getTitle(DOMElement $element) : ?string {
        $title = $element->textContent;

        return (!empty($title) && !preg_match("/^[(Just a moment...)]/", $title))
                ? $title
                : null;
    }
}
