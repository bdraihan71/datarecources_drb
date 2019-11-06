<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PageItem;
class PageItemController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'particular' => 'required',
            'page_id' => 'required'
        ]);
        //TODO:: add file upload code
        $page_item = new PageItem([
            'particular' => $request->get('particular'),
            'excel_file_url' => '#',
            'pdf_file_url' => '#',
            'excel_file_url_download_count' => 0,
            'pdf_file_url_download_count' => 0,
            'page_id' => $request->get('page_id')
        ]);
        $page_item->save();
        return redirect()->back()->with('success', 'Page item has been created successfully');
    }
}
