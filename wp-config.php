<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'tmdt' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ysCdXYS[u[?h^rd,Xe09Vp`D}@04qJFq*z8Tb|}y{h[$W@}nd)D+HiGmIL6?)?#c' );
define( 'SECURE_AUTH_KEY',  'D(3~L@ UT?.$FBRm-*HEV_Ok[?-pe4PmNQ3_49gmAHx=&#<`u.o}ktz2M}B25^5!' );
define( 'LOGGED_IN_KEY',    ',,zh<{?M6}FHv$9!tb-:*jGSz16s<!by*8>8tnv:IOT0!Fo^c9*8Iuc2Xfe;+Hm1' );
define( 'NONCE_KEY',        '$}}^zEvKw%.WF9nm64^8X?@/+g3^S^6avJ6CK AT|W?H:+]P;QBr2gS7kR7@3c$t' );
define( 'AUTH_SALT',        ' PJso3S&wHbGu=%G0EqT0Kz~ukD?T}J!>M,x7&,q{-;AOj-k-_]3m&>k/lFlS@{e' );
define( 'SECURE_AUTH_SALT', 'd4Kqn~rdLX;2c2zv2qhynIKgfSVwp1;r{ }?9Q bGy<.o*L|~G5 [d3O@BZ^,|RS' );
define( 'LOGGED_IN_SALT',   'Xv#e1{F/ Y&(N[K_b^.o>T~x2WvrVMRt8Kp{?D!Cf0*Bl=&D4*14B6)<BY9~D6~p' );
define( 'NONCE_SALT',       'cB`tH]vk{f=96l&a*$LhEuT0|fXX$7DoBbWD:enq&r6QfW,cuB-c*-/ak,Pbm%o!' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
