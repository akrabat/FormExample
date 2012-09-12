<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class RenderForm extends AbstractHelper
{
    public function __invoke($form)
    {
        $form->prepare();

        $output = $this->view->form()->openTag($form) . PHP_EOL;

        $elements = $form->getElements();
        foreach ($elements as $element) {
            $output .= $this->view->formRow($element) . PHP_EOL;
        }

        $output .= $this->view->form()->closeTag($form) . PHP_EOL;

        return $output;
    }
}
