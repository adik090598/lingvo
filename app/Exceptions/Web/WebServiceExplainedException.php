<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 13:22
 */

namespace App\Exceptions\Web;

use App\Exceptions\BaseException;

class WebServiceExplainedException extends BaseException
{
    protected $explanation;

    /**
     * WebServiceExplainedException constructor.
     * @param $explanation
     */
    public function __construct($explanation)
    {
        $this->explanation = $explanation;
    }

    /**
     * @return mixed
     */
    public function getExplanation()
    {
        return $this->explanation;
    }

    public function getApiResponse()
    {
        return redirect()->back()->with('error', $this->getExplanation());
    }

}