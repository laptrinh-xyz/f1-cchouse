<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: PostFormRequest.php,v 1.0 2015/06/22 08:43 htien Exp $
 */

namespace NhaThieuNhi\Http\Requests;

class PostFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post_title'   => 'required|min:1|max:120',
            'post_excerpt' => 'required|min:2|max:300',
            'post_content' => 'required|min:3'
        ];
    }
}