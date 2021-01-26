<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 17:02
 */

namespace App\Core\Traits;


trait WebToastTrait
{
    public function makeToast($type, $message)
    {
        request()
            ->session()
            ->flash($type, $message);
    }

    public function getProblemsText()
    {
        return trans('actions.problems');
    }

    public function getAddedText()
    {
        return trans('actions.added');
    }

    public function getDeletedText()
    {
        return trans('actions.deleted');
    }

    public function getEditedText()
    {
        return trans('actions.edited');
    }

    public function getNotFoundText()
    {
        return trans('actions.not.found');
    }

    public function getHasRelationText()
    {
        return trans('actions.has.relations');
    }

    public function getErrorText()
    {
        return trans('admin.error');
    }

    public function warning()
    {
        $this->makeToast('warning', $this->getProblemsText());
    }

    public function added()
    {
        $this->makeToast('success', $this->getAddedText());
    }

    public function deleted()
    {
        $this->makeToast('error', $this->getDeletedText());
    }

    public function edited()
    {
        $this->makeToast('success', $this->getEditedText());
    }

    public function notFound()
    {
        $this->makeToast('warning', $this->getNotFoundText());
    }

    public function error()
    {
        $this->makeToast('error', $this->getErrorText());
    }
}