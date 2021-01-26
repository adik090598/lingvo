<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 13:25
 */

namespace App\Exceptions\Web;

use App\Exceptions\BaseException;

class WebServiceException extends BaseException
{
    protected $validator;
    protected $inputs;
    protected $toRoute;

    /**
     * WebServiceException constructor.
     * @param $validator
     * @param $inputs
     * @param $toRoute
     */
    public function __construct($validator, $inputs, $toRoute = null)
    {
        $this->validator = $validator;
        $this->inputs = $inputs;
        $this->toRoute = $toRoute;
    }

    /**
     * @return mixed
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @return mixed
     */
    public function getInputs()
    {
        return $this->inputs;
    }

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getToRoute()
    {
        return $this->toRoute;
    }

    public function getApiResponse()
    {
        if ($this->toRoute) {
            return redirect()->to($this->toRoute)->withErrors($this->getValidator())->withInput();
        } else {
            return redirect()->back()->withErrors($this->getValidator())->withInput();
        }
    }


}