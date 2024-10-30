<?PHP
/*
 Plugin Name: K-Weather (Korea Weather 대한민국 날씨 위젯)
 Plugin URI: http://akal.co.kr/
 Description: 기상청에서 날씨를 받아와 블로그에 표시하는 플러그인입니다.
 Version: 1.1.3
 Author: YoungBin Ko
 Author URI: http://akal.co.kr/
 License: GPLv2
 */

class KWeather_Widget extends WP_Widget {

	public function __construct() {
        $widget_ops = array('classname' => 'KWeather_Widget',
                            'description'=> '한국 기상청에서 날씨를 받아와서 보여줍니다.');
        $this->WP_Widget('kweather_widget', 'K-Weather 날씨 위젯', $widget_ops);
	}

 	public function form( $instance ) {        // widget form for admin 
        $defaults = array('title'=> '');
        $instance = wp_parse_args((array)$instance, $defaults);
        $title = strip_tags($instance['title']);
        $karea = strip_tags($instance['karea']);
        $kw_custom_style = strip_tags($instance['kw_custom_style']);

?>
        <p>제 목 :
        <input class='widefat' name='<?php echo $this->get_field_name('title'); ?>' type='text' value='<?php echo attribute_escape($title); ?>' >
        </p>
        <p>지역 선택:
        <select class="widefat" name="<?php echo $this->get_field_name('karea');?>">
            <option value="seoul" <?php echo ($karea=='seoul')?'selected':''; ?>>서울</option>
            <option value="busan" <?php echo ($karea=='busan')?'selected':''; ?>>부산</option>
            <option value="gwangju" <?php echo ($karea=='gwangju')?'selected':''; ?>>광주</option>
            <option value="daegu" <?php echo ($karea=='daegu')?'selected':''; ?>>대구</option>
            <option value="daejeon" <?php echo ($karea=='daejeon')?'selected':''; ?>>대전</option>
            <option value="incheon" <?php echo ($karea=='incheon')?'selected':''; ?>>인천</option>
            <option value="ulsan" <?php echo ($karea=='ulsan')?'selected':''; ?>>울산</option>
            <option value="gyeonggi" <?php echo ($karea=='gyeonggi')?'selected':''; ?>>경기도</option>
            <option value="gangwon" <?php echo ($karea=='gangwon')?'selected':''; ?>>강원도</option>
            <option value="chungbuk" <?php echo ($karea=='chungbuk')?'selected':''; ?>>충청북도</option>
            <option value="chungnam" <?php echo ($karea=='chungnam')?'selected':''; ?>>충청남도</option>
            <option value="jeonbuk" <?php echo ($karea=='jeonbuk')?'selected':''; ?>>전라북도</option>
            <option value="jeonnam" <?php echo ($karea=='jeonnam')?'selected':''; ?>>전라남도</option>
            <option value="gyeongbuk" <?php echo ($karea=='gyeongbuk')?'selected':''; ?>>경상북도</option>
            <option value="gyeongnam" <?php echo ($karea=='gyeongnam')?'selected':''; ?>>경상남도</option>
            <option value="jeju" <?php echo ($karea=='jeju')?'selected':''; ?>>제주도</option>
        </select>
        </p>
		<p> 개인 CSS
		<textarea class='widefat' name='<?php echo $this->get_field_name('kw_custom_style'); ?>' type='text' rows="10"><?php echo attribute_escape($kw_custom_style); ?></textarea>
		<p>
		Custom CSS는 <a href="https://wordpress.org/plugins/k-weather/changelog/" target="_new">changelog</a>를 참고해서 작성하세요.
		</p>

<?php
	}

	public function update( $new_instance, $old_instance ) {    // Save widget option
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['karea'] = strip_tags($new_instance['karea']);
        $instance['kw_custom_style'] = strip_tags($new_instance['kw_custom_style']);
        return $instance;
    }

	public function widget( $args, $instance ) {    // display widget

        $karea = strip_tags($instance['karea']);
        $kw_custom_style = strip_tags($new_instance['kw_custom_style']);

        switch($karea)
        {
            case 'seoul' :
                $url['seoul'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=61&gridy=125";
                break;
            case 'busan' :
                $url['busan'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=99&gridy=76";
                break;
            case 'gwangju' :
                $url['gwangju'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=58&gridy=74";
                break;
            case 'daegu' :
                $url['daegu'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=89&gridy=90";
                break;
            case 'daejeon' :
                $url['daejeon'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=67&gridy=100";
                break;
            case 'incheon' :
                $url['incheon'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=55&gridy=124";
                break;
            case 'ulsan' :
                $url['ulsan'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=102&gridy=84";
                break;
            case 'gyeonggi' :
                $url['gyeonggi'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=60&gridy=120";
                break;
            case 'gangwon' :
                $url['gangwon'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=92&gridy=132"; 
                break;
            case 'chungbuk' :
                $url['chungbuk'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=69&gridy=107";
                break;
            case 'chungnam' :
                $url['chungnam'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=55&gridy=107";
                break;
            case 'jeonbuk' :
                $url['jeonbuk'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=63&gridy=88";
                break;
            case 'jeonnam' :
                $url['jeonnam'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=51&gridy=67";
                break;
            case 'gyeongbuk' :
                $url['gyeongbuk'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=84&gridy=96";
                break;
            case 'gyeongnam' :
                $url['gyeongnam'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=91&gridy=77";
                break;
            case 'jeju' :
                $url['jeju'] = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=52&gridy=38";
                break;
        }

        $url2 = "http://www.kma.go.kr/weather/forecast/mid-term-rss3.jsp?stnld=184";

        while(!is_null($key = key($url)))
        {
			$addr = $url[$key];

			$info = parse_url($addr);

			$send = "POST " . $info["path"] . " HTTP/1.1\r\n"
				. "Host: " . $info["host"] . "\r\n"
		        . "Content-type: application/x-www-form-urlencoded\r\n"
			    . "Content-length: " . strlen($info["query"]) . "\r\n"
				. "Connection: close\r\n\r\n" . $info["query"];
 
		    $fp = fsockopen($info["host"], 80);

				fputs($fp, $send);
 
			    $start = false;
				$retVal = "";
				$header = "";
				$pattern = "/<(.|\n)*?>/";
 
			    while (!feof ($fp)) {
				    $tmp = fgets($fp, 1024);
					if ( $start == true )
					{
						if(preg_match($pattern, trim($tmp))) $retVal .= trim($tmp);
					}
				    if ($tmp == "\r\n") $start = true;
				}
 
			fclose($fp);

            preg_match_all("|<[^>]+>(.*)</[^>]+>|U",$retVal, $out, PREG_PATTERN_ORDER);

			$temp = preg_replace("/<(.|\n)*?>/", "", $out[0][6]);
			$weather = preg_replace("/<(.|\n)*?>/", "", $out[0][11]);
            $humidity = preg_replace("/<(.|\n)*?>/", "", $out[0][20]); // 습도
            $windspeed =  sprintf('%.1f', preg_replace("/<(.|\n)*?>/", "", $out[0][16])); // 풍속

            switch($weather)
            {
                case "맑음" :
                    $wicon0 = "<i class=\"wi wi-day-sunny fa-4x\" style=\"color:" . $color . ";font-size: 4em;\"></i>";
                    $wicon1 = "<i class=\"wi wi-day-sunny text-aqua\" style=\"font-size:48px;color:#4F4F4F;\"></i>";
                    break;
                case "흐림" : 
                    $wicon0 = "<i class=\"wi wi-cloudy fa-4x\" style=\"color:" . $color . ";font-size: 4em;\"></i>";
                    $wicon1 = "<i class=\"wi wi-cloudy text-aqua\" style=\"font-size:48px;color:#4F4F4F;\"></i>";
                    break;
                case "구름 조금" :
                    $wicon0 = "<i class=\"wi wi-day-cloudy fa-4x\" style=\"color:" . $color . ";font-size: 4em;\"></i>";
                    $wicon1 = "<i class=\"wi wi-day-cloudy text-aqua\" style=\"font-size:48px;color:#4F4F4F;\"></i>";
                    break;
                case "구름 많음" :
                    $wicon0 = "<i class=\"wi wi-cloudy fa-4x\" style=\"color:" . $color . ";font-size: 4em;\"></i>";
                    $wicon1 = "<i class=\"wi wi-cloudy text-aqua\" style=\"font-size:48px;color:#4F4F4F;\"></i>";
                    break;
                case "비" :
                    $wicon0 = "<i class=\"wi wi-rain fa-4x\" style=\"color:" . $color . ";font-size: 4em;\"></i>";
                    $wicon1 = "<i class=\"wi wi-rain text-aqua\" style=\"font-size:48px;\"></i>";
                    break;
                case "눈/비" :
                    $wicon0 = "<i class=\"wi wi-rain-mix fa-4x\" style=\"color:" . $color . ";font-size: 4em;\"></i>";
                    $wicon1 = "<i class=\"wi wi-rain-mix text-aqua\" style=\"font-size:48px;color:#4F4F4F;\"></i>";
                    break;
                case "눈" :
                    $wicon0 = "<i class=\"wi wi-snow fa-4x\" style=\"color:" . $color . ";font-size: 4em;\"></i>";
                    $wicon1 = "<i class=\"wi wi-snow text-aqua\" style=\"font-size:48px;color:#4F4F4F;\"></i>";
                    break;
                default :
                    $wicon0 = $weather;
            }

            $wcode = $wicon0;

//            $curr_weather[$key][0] = $weather . '<p>' . $temp . '℃';
            next($url);
        }

        $weather_str = '<div class=\'kw-font\'>날씨 : ' . $weather . '</div><div class=\'kw-font\'>기온 : ' . $temp . '℃</div><div class=\'kw-font\'>습도 : ' . $humidity . '%</div><div class=\'kw-font\'>풍속 : ' . $windspeed . 'm/s</div>';

        extract($args);

        $ntitle = "<div class='kw-title'>" . strip_tags($instance['title']) . "</div>";

        echo '<div class=\'kw-widget\'>' . $before_widget;
        echo $ntitle . '<div class=\'kw-content\'><div class=\'kw-left\'>' . $wcode . '</div><div>' . $weather_str . '</div></div><div style=\'font-size: 9pt; float: right;\'>출처 : 기상청</div>';
        echo $after_widget . '</div>';
	}
}

function kweather_register_widgets() {
     register_widget('KWeather_Widget');
}

add_action('widgets_init', 'kweather_register_widgets');


// Weather Font icons CSS Load
function prefix_add_kweather_stylesheet() {
    // Respects SSL, Style.css is relative to the current file
    wp_register_style( 'prefix-style', plugins_url('/weather-icons-master/css/weather-icons.min.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );

	$dummy = new KWeather_Widget();
	$settings = $dummy->get_settings();
	extract($settings[2]); 

    wp_add_inline_style('prefix-style', $kw_custom_style);
}

add_action( 'wp_enqueue_scripts', 'prefix_add_kweather_stylesheet' );

?>