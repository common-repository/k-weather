=== Plugin Name ===
Contributors: Youngbin Ko (akalkid)
Donate link: http://akal.co.kr
Plugin URI: http://akal.co.kr/?p=862
Tags: 기상청, 날씨, weather, k-weather, 동네예보, 지역날씨
Requires at least: 3.4
Tested up to: 4.4
Stable tag: 4.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

기상청에서 날씨데이터를 받아와 위젯으로 보여주는 플러그인 입니다.

== Description ==

기상청에서 날씨를 받아와 Aweasome Font icon을 이용해 위젯으로 보여주는 플러그인입니다.

위젯 설정 화면에서 지역을 선택하시면 해당지역의 날씨를 보여줍니다.
설정 면적이 큰 지역(각 지역도)의 경우 도청을 중심으로 날씨를 보여주게 됩니다.

추후 업그레이드를 통해 자신이 사는 동네 좌표를 직접 입력하실수 있도록 개선할 생각입니다.


== Installation ==

플러그인을 설치하시기 위해서 다음과 같은 순서로 진행하시면 됩니다.

1. 플러그인을 다운로드 받습니다.
2. 다운로드 받은 플러그인을 FTP로 Plugins/k-weather 폴더로 넣습니다.
3. 압축을 풀고 플러그인 관리에서 k-weather 플러그인을 활성화 시킵니다.
4. 위젯 설정화면으로 갑니다.
5. 위젯을 보내고 싶은 사이드바 등에 표시하신후에 편집을 눌러 설정합니다.
6. 제목과 지역을 설정하고 저장해줍니다.
7. 블로그 홈화면이나 설정한 화면으로 가시면 날씨 위젯이 표시됩니다.

* 설정이 이루어지지 않을 경우 1.1.2 이전버전을 사용하시는 분들은 위젯을 삭제하신 후에 다시 위젯을 추가해주십시요.

* Custom CSS 설정은 changelog 1.1.2 부분을 참고해주세요.

== Frequently Asked Questions ==

문의사항은 http://akal.co.kr/ 블로그쪽으로 남겨주세요.
최초 댓글 작성시 승인이 필요합니다. 승인대기 중일때 댓글이 보이지 않을수 있으니 양해부탁드립니다.

== Screenshots ==

1. 사이드바에 나타나는 위젯 적용화면
2. 위젯 설정 화면
3. 위젯 설정하기 #1
4. Custom CSS 설정하기. changelog 1.1.2 부분을 참고하세요.

== Changelog ==

= 1.1.3 =

* 아주 작은 버그 수정과 화면수정

= 1.1.2 = 

* 글자색 전경색을 없애고 custom css를 넣을수 있도록 만들었습니다. 

* Custom CSS Sample
<pre>
/* 전체 위젯 배경색과 글자색 */ 
.kw-widget {
    background-color: orange;
}

/* 위젯 제목 글자색과 크기 */
.kw-title {
    color: white;
    font-size: 12pt;
}

/* 날씨아이콘 크기와 색상 */
.wi {
    font-size: 14pt;
    color: white;
}

/* 날씨 글자의 크기와 색상을 지정 */
.kw-font {
    font-size: 9pt;
    color: white;
}

/* 날씨 아이콘, 날씨내용이 나오는 영역크기 */
.kw-content {
    height: 100px;
}

/* 날씨 아이콘이 나오는 영역설정 */
.kw-left {
    height: 100%;
    float: left;
    padding-top: 20px;
    margin-right: 20px;
}
</pre>
이 Custom CSS 를 적절히 변경해서 자유도가 높은 디자인 변경이 가능해집니다.


= 1.1.0 = 

* allow_url_fopen 설정이 대부분의 웹사이트가 보안문제로 막혀 있어서 설정의 귀찮음을 덜기위해 소켓방식으로 변경하여 allow_url_fopen 설정의 변경없이도 날씨 정보를 가져올수 있도록 변경하였습니다.


= 1.0.1 = 

* bootstrap css가 없는 분들을 위해 fa-4x 폰트크기를 font-size:4em 으로 지정
* line-height: 150% 지정


= 1.0.0 =
* 배경색과 글자색을 지정할수 있게 바꿈
* white, black, blue 등의 색지정이 가능하고, #1188aa 이렇게 코드로 넣어도 된다.
* title color 변경은 아래와 같이 해야합니다.

title에 해당하는 '현재 제주 날씨'의 컬러는 css에서 진행하면 됩니다. 

.KWeather_Widget {
    color: yellow;
}

위와 같은 코드를 삽입해주세요.


= 0.9.0 =
* 화면배치를 바꿈

= 0.1.0 =
* 기상청에서 날씨를 받아와 각 지역별로 보여줌


== Upgrade Notice ==

= 1.0.0 = 
* 배경색 지정기능 추가

= 2.0.0 = 
* 지역코드를 직접 지정해서 동네예보 수준이 가능하도록 업그레이드 예정
