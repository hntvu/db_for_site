<?php

if (isset($_SESSION['ckfinder'])) {
    if (isset($_SESSION['CKFinder_UserRole'])) {
        $_SESSION['KCFINDER'] = array(
            'disabled' => false,
            'access' => array(
                'files' => array(
                    'upload' => true,
                    'delete' => true,
                    'copy' => true,
                    'move' => true,
                    'rename' => true
                ),
                'dirs' => array(
                    'create' => true,
                    'delete' => true,
                    'rename' => true
                )
            ),
        );
    } else {
        $_SESSION['KCFINDER'] = array(
            'disabled' => false,
            'access' => array(
                'files' => array(
                    'upload' => true,
                    'delete' => false,
                    'copy' => false,
                    'move' => false,
                    'rename' => false
                ),
                'dirs' => array(
                    'create' => false,
                    'delete' => false,
                    'rename' => false
                )
            ),
        );
    }
}

return array(
    // GENERAL SETTINGS
    'disabled' => true,
    'uploadURL' => "/ttth/uploads/",
    'uploadDir' => "",
    'theme' => "default",
    'types' => array(
        // (F)CKEditor types
        'files' => "",
        'flash' => "swf",
        'media' => "avi mpg mpeg mov mp4 mkv flv",
        'misc' => "! pdf doc docx xls xlsx",
        'source' => "*img",
    ),
    // IMAGE SETTINGS
    'imageDriversPriority' => "imagick gmagick gd",
    'jpegQuality' => 90,
    'thumbsDir' => ".thumbs",
    'maxImageWidth' => 0,
    'maxImageHeight' => 0,
    'thumbWidth' => 100,
    'thumbHeight' => 100,
    'watermark' => "",
    // DISABLE / ENABLE SETTINGS
    'denyZipDownload' => false,
    'denyUpdateCheck' => false,
    'denyExtensionRename' => false,
    // PERMISSION SETTINGS
    'dirPerms' => 0755,
    'filePerms' => 0644,
    'access' => array(
        'files' => array(
            'upload' => true,
            'delete' => true,
            'copy' => true,
            'move' => true,
            'rename' => true
        ),
        'dirs' => array(
            'create' => true,
            'delete' => true,
            'rename' => true
        )
    ),
    'deniedExts' => "exe com msi bat cgi pl php phps phtml php3 php4 php5 php6 py pyc pyo pcgi pcgi3 pcgi4 pcgi5 pchi6",
    // MISC SETTINGS
    'filenameChangeChars' => array(
        ' ' => "_",
        ':' => "."
    ),
    'dirnameChangeChars' => array(
        ' ' => "_",
        ':' => "."
    ),
    'mime_magic' => "",
    'cookieDomain' => "",
    'cookiePath' => "",
    'cookiePrefix' => 'KCFINDER_',
    // THE FOLLOWING SETTINGS CANNOT BE OVERRIDED WITH SESSION SETTINGS
    '_sessionVar' => "KCFINDER",
    '_sessionLifetime' => 30, // In minutes
    '_check4htaccess' => true,
    '_normalizeFilenames' => false,
    '_dropUploadMaxFilesize' => 10485760,
);