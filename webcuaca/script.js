const apiKey = '016da82004e97468fe6f403f4206bb8f'; // Ganti dengan API key Anda
const city = 'Surabaya'; // Ganti dengan nama kota yang diinginkan
const weatherDiv = document.getElementById('weather');

function getWeather() {
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`;

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error cok.');
            }
            return response.json();
        })
        .then(data => {
            const location = data.name;
            const temperature = data.main.temp;
            const description = data.weather[0].description;
            const humidity = data.main.humidity;
            const windSpeed = data.wind.speed;

            weatherDiv.innerHTML = `
                <h2>Cuaca di ${location}</h2>
                <p>Temperatur: ${temperature} °C</p>
                <p>Kondisi: ${description}</p>
                <p>Kelembapan: ${humidity}%</p>
                <p>Kecepatan Angin: ${windSpeed} m/s</p>
            `;
        })
        .catch(error => {
            weatherDiv.innerHTML = `<p>${error.message}</p>`;
        });
}

getWeather();

refreshButton.addEventListener('click', getWeather);