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

        $isPermited = function ($userpermissions = [], $permissions, $option = 'required-all') {
            $result = false;

            // jika memiliki semua akses
            if ($userpermissions == '*') {
                return true;
            }

            // option "required-all"
            if ($option == 'required-all') {
                $permissionAmount = count($permissions);
                foreach ($userpermissions as $key => $value) {
                    foreach ($permissions as $key1 => $value1) {
                        if ($value == $value1) {
                            $permissionAmount--;
                        }
                    }
                }
                $result = $permissionAmount == 0 ? true : false;
            } else {
                // option "required-one"
                foreach ($userpermissions as $key => $value) {
                    if (in_array($value, $permissions)) {
                        $result = true;
                        break;
                    }
                }
            }

            return $result;
        };

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

if (!function_exists('component')) {
    /**
     * Get component
     *
     * @param string $path
     * @param array $datas
     * @return string
     */
    function component(string $path = '', array $datas)
    {
        $base_path = 'cms';
        $component_path = file_get_contents(__DIR__ . '/../../pages/public/' . $base_path . '/' . $path . '.php');

        extract($datas, EXTR_SKIP);

        $component_final = $component_path;
        foreach ($datas as $key => $value) {
            $component_final = str_replace('{' . $key . '}', $value, $component_final);
        }

        return html_entity_decode($component_final);
    }
}

if (!function_exists('str_limit')) {
    /**
     * Limit string
     *
     * @param string $string
     * @param int $limit
     * @param string $end
     * @return string
     */
    function str_limit($string, $limit, $end = '...')
    {
        return strlen($string) > $limit ? substr($string, 0, $limit) . $end : $string;
    }
}
