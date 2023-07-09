// Configurações da data

const data = new Date()

const dia = String(data.getDate()).padStart(2, '0')

const mes = String(data.getMonth() + 1).padStart(2, '0')

const ano = data.getFullYear()

const dataAtual = `${dia}/${mes}/${ano}`

const date = document.getElementById('data')

date.innerHTML = dataAtual

// Configurações da Hora

const horas = data.getHours()
const minutos = data.getMinutes()

const hour = document.getElementById('hora')

hour.innerHTML = `${horas}:${minutos}`



