<?php

use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\Response;

if (!function_exists('render_template')) {

    /**
     * Render template
     *
     * @param string $page
     * @param array $data
     * @param Request $request
     * @return Response
     */
    function render_template($page, $data = [], $request = null)
    {
        if (!is_null($request)) {
            extract($request->attributes->all(), EXTR_SKIP);
        }

        // $errors = SessionData::get()->getFlashBag()->get('errors', []);
        function errors($key = null)
        {
            global $errors;
            $html_elem = '';
            if (isset($errors[$key])) {
                $html_elem = html_entity_decode('<span class="text-danger d-block"><b>' . $errors[$key] . '</b></span>');
            }
            return $html_elem;
        }

        $success = SessionData::get()->getFlashBag()->get('success', []);
        function success($key = null)
        {
            global $success;
            $html_elem = '';
            if (isset($success[$key])) {
                $html_elem = html_entity_decode('<span class="text-success d-block"><b>' . $success[$key] . '</b></span>');
            }
            return $html_elem;
        }

        $data['errors'] = SessionData::get()->getFlashBag()->get('errors', []);
        extract($data, EXTR_SKIP);

        ob_start();
        include sprintf(__DIR__ . '/../../../src/pages/%s.php', $page);

        return new Response(ob_get_clean());
    }
}

if (!function_exists('env')) {

    /**
     * Get the value of an environment variable
     */
    function env($key, $default = '')
    {
        $value = '';
        if (isset($_ENV[$key])) {
            $value = $_ENV[$key];
        } else {
            $value = $default;
        }

        return $value;
    }
}

if (!function_exists('str_slug')) {

    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string $string
     * @param  string $separator
     * @return string
     */
    function str_slug(string $string, string $separator = '-')
    {
        $lowercase_judul = strtolower($string);
        $replacespasi = str_replace(' ', $separator, $lowercase_judul);
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $replacespasi);

        return $slug;
    }
}

if (!function_exists('show')) {
    /**
     * Show value of variable
     *
     * @param mixed $var
     * @return void
     */
    function show($var)
    {
        return isset($var) ? $var : '';
    }
}

if (!function_exists('session')) {
    /**
     * Get session
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function session($key = null)
    {
        return $key == null ? SessionData::get()->all() : SessionData::get($key);
    }
}

if (!function_exists('arr_offset')) {
    /**
     * Get offset of array
     *
     * @return mixed
     */
    function arr_offset($array, $offset)
    {
        return $array && isset($array[$offset]) ? $array[$offset] : null;
    }
}

if (!function_exists('storage_path')) {
    /**
     * Get storage path
     *
     * @param string $path
     * @return string
     */
    function storage_path($path = '')
    {
        return __DIR__ . '/../../../web/assets/media/' . $path;
    }
}

if (!function_exists('fonts_path')) {
    /**
     * Get fonts path
     *
     * @param string $path
     * @return string
     */
    function fonts_path($path = '')
    {
        return __DIR__ . '/../../../web/assets/fonts/' . $path;
    }
}

// if (!function_exists('errors')) {
//     /**
//      * Show errors message
//      *
//      * @param string $key
//      * @param mixed $default
//      * @return mixed
//      */
//     function errors($key = null)
//     {
//         $errors = SessionData::get()->getFlashBag()->get('errors', []);
//         $html_elem = '';
//         if (isset($errors[$key])) {
//             $html_elem = html_entity_decode('<span class="text-danger d-block"><b>' . $errors[$key] . '</b></span>');
//         }
//         return $html_elem;
//     }
// }

// if (!function_exists('success')) {
//     /**
//      * Show success message
//      *
//      * @param string $key
//      * @param mixed $default
//      * @return mixed
//      */
//     function success($key = null)
//     {
//         $success = SessionData::get()->getFlashBag()->get('success', []);
//         $html_elem = '';
//         if (isset($success[$key])) {
//             $html_elem = html_entity_decode('<span class="text-success d-block"><b>' . $success[$key] . '</b></span>');
//         }
//         return $html_elem;
//     }
// }
