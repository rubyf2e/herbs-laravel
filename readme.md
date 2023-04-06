技術使用<br>

後端<br>
laravel<br>
laravel admin<br>
composer<br>
RESTful API<br>
Digital ocean<br>


前端<br>
vue<br>
客製化非css框架自適應排版<br>
Svg 圖片動畫<br>
svg整合javascript動畫<br>
TimelineMax動畫<br>
webpack<br>
gulp<br>
json server<br>
google Map Api<br>
CSS3<br>
HTML5<br>
CSS Transition<br>



## 話說

雖然這個專案的 RESTful API 用的很不恰當，目前就放生它了～   
表示我對於過往的 legacy code 沒有什麼潔癖，新的東西做好就好了XD  
不過我還是知道 RESTful API 要怎麼設計唷～～～
不要因為我金魚腦有的時候忘記了所以就認為我不會唷～

```
ex:
[POST] 可用在新增 slider 資料
Request URL: https://{domain}/herbs-laravel/public/api/sliders
Request Method: POST
Payload: 放相關的 Json


[GET] 可用在取得 slider 全部的資料
Request URL: https://{domain}/herbs-laravel/public/api/sliders
Request Method: GET
Payload: 不用放

[GET] 可用在取得 slider id=1 資料
Request URL: https://{domain}/herbs-laravel/public/api/sliders/1
Request Method: GET
Payload: 不用放

[PUT] 可用在更新 slider id=1 資料
Request URL: https://{domain}/herbs-laravel/public/api/sliders/1
Request Method: PUT
Payload: 放相關的 Json

[PATCH] 可用在更新部分 slider id=1 資料
Request URL: https://{domain}/herbs-laravel/public/api/sliders/1
Request Method: PATCH
Payload: 放相關的 Json

[DELETE] 可用在刪除 slider id=1 資料
Request URL: https://{domain}/herbs-laravel/public/api/sliders/1
Request Method: DELETE
Payload: 不用放

備註：https://{domain}/herbs-laravel/public/api/{要放資源群的名詞，複數的名詞的意思}
```
