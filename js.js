let weather=document.querySelector("#weather")

if(weather) {
    getData()
}

async function getData() {
    let server="https://api.openweathermap.org/data/2.5/onecall?lat=60.055441&lon=30.31348&appid=d8e0caa1de530474910bf41580d4a76f&units=metric&lang=ru"
    let request=await fetch(server, {method: "GET"})
    let res=await request.json()
    if(request.ok) {
        getWeather(res)
    }
}

function getWeather(weather) {
    let icon=weather.current.weather[0]["icon"]
    // document.querySelector(".temp-val").innerHTML=Math.round(weather.current.temp)+"°C"
    // document.querySelector(".temp-feel").innerHTML+=Math.round(weather.current.feels_like)+"°C"
    // document.querySelector(".desc").innerHTML=weather.current.weather[0]["description"] 
    // document.querySelector(".icon").src=`https://openweathermap.org/img/wn/${icon}@2x.png`
    let temp=Math.round(weather.current.temp)+"°C"
    let like=Math.round(weather.current.feels_like)+"°C"
    let desc=weather.current.weather[0]["description"] 
    let icon_w=fetch(`https://openweathermap.org/img/wn/${icon}@2x.png`)
    weather.innerHTML=`<span class="city">Санкт-Петербург</span>
    <div class="temp">
        <div class="temp-val">${temp}</div>
        <div class="temp-feel">По ощущениям: ${temp}</div>
    </div>
    <div class="weather-icon">
        <img class="icon">${icon_w}<br>
        <span class="desc">${desc}</span>
    </div>
    <div class="weather-info"></div>
    <span></span>`
}























// document.getElementById("button").onclick=() => {
//     document.getElementById("input").innerHTML=`<input id="input-city" type="text" placeholder="Введите город">
//     <input type="button" id="check" value="Готово" onclick=city()>`
//     document.getElementById("button").style.display="none"
// }
// document.getElementById("check").onclick=() => {
//     let city=document.getElementById("input-city").value
//     alert(city)
//     //request=await fetch("https://api.openweathermap.org/geo/1.0/direct?q=&appid=d8e0caa1de530474910bf41580d4a76f")
// }

// async function city() {
//     let city=document.getElementById("input-city").value
//     //alert(city)
//     let request=await fetch(`https://api.openweathermap.org/geo/1.0/direct?q=${city}&appid=d8e0caa1de530474910bf41580d4a76f`)
//     let r=await request.json()
//     console.log(r)
//     // getData(r[0]["lat"], r[0]["lon"])
//     document.querySelector(".city").innerHTML=city
// }