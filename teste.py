import requests
import json

url = "https://api.binance.com/api/v3/ticker/price?symbol=ETHBRL"

requisicao = requests.get(url)

resposta = requisicao.json()

preco = str(resposta['price'])
print(preco)
