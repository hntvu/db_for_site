<?php

/** This file is part of KCFinder project
 *
 *      @desc Browser calling script
 *   @package KCFinder
 *   @version 3.12
 *    @author Pavel Tzonkov <sunhater@sunhater.com>
 * @copyright 2010-2014 KCFinder Project
 *   @license http://opensource.org/licenses/GPL-3.0 GPLv3
 *   @license http://opensource.org/licenses/LGPL-3.0 LGPLv3
 *      @link http://kcfinder.sunhater.com
 */
session_start();
if (isset($_SESSION['ckfinder'])) {
    require "core/bootstrap.php";
    $browser = "kcfinder\\browser"; // To execute core/bootstrap.php on older
    $browser = new $browser();      // PHP versions (even PHP 4)
    $browser->action();
} else {
    exit("<body style='background: #c00'><div style='max-width: 1000px; margin: 10% auto; text-align: center;'><span style='color: white;font-size: 1.2em;'>You don't currently have permission to access this folder</span><br><span style='color: white; font-size: 1.1em;'>Bạn không được phép truy cập vào folder này</span></div></body>");
}