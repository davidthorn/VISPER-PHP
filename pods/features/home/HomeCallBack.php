<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace VISPER;

/**
 * Description of HomeCallBack
 *
 * @author david
 */
class HomeCallBack implements IVISPERCallback
{
    public function execute(IVISPERResult $result, IVISPERError $error)
    {
         echo "we did something in the callback";
    }

    
}