<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    protected string $default_version = '1.0';

    public function view(Request $request)
    {
        $version = $request->query('v') ?: $this->default_version;
        $docs = $this->docsForVersion($version);

        return $docs ? view('documentation', compact('docs')) : redirect()->to(route('docs'));
    }

    protected function docsForVersion(string $version): array|null
    {
        $path = resource_path("docs/$version.php");

        return \File::exists($path) ? require $path : null;
    }
}
