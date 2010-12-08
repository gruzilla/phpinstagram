<?php
/**
 * @category   Instagram
 * @package    Instagram_Command_Media
 * @copyright  Copyright (c) 2010-2011 Matthias Steinbšck <matthias@abendstille.at>
 * @license    New BSD License (enclosed file docs/LICENSE)
 */
class Instagram_Command_Media_Upload extends Instagram_Command_AbstractCommand
{
/**
 * TODO:
 * POST /api/v1/media/upload/ HTTP/1.1\r\n
 * Content-Type: multipart/form-data; charset=utf-8; boundary=0xKhTmLbOuNdArY
--0xKhTmLbOuNdArY
Content-Disposition: form-data; name="device_timestamp"

0
--0xKhTmLbOuNdArY
Content-Disposition: form-data; name="lat"

0
--0xKhTmLbOuNdArY
Content-Disposition: form-data; name="lng"

0
--0xKhTmLbOuNdArY
Content-Disposition: form-data; name="photo"; filename="file"
Content-Type: application/octet-stream
.....
binary data
...

 * {"status": "ok"}
 */
	
}