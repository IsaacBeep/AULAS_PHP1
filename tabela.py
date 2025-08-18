from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
import time

# Remova o caminho manual e use o Service com webdriver-manager
from webdriver_manager.chrome import ChromeDriverManager

service = Service(ChromeDriverManager().install())
driver = webdriver.Chrome(service=service)

try:
    driver.get("C:\xampp\htdocs\php_Isaac\AULAS_PHP\Formulario\tarefas.php")

    campo_nome = driver.find_element(By.ID, "id-do-campo-nome")
    campo_quantidade = driver.find_element(By.ID, "id-do-campo-quantidade")
    campo_preco = driver.find_element(By.ID, "id-do-campo-preco")
    botao_adicionar = driver.find_element(By.ID, "id-do-botao-adicionar")

    campo_nome.send_keys("Laptop Gamer")
    campo_quantidade.send_keys("5")
    campo_preco.send_keys("7500.00")

    botao_adicionar.click()
    time.sleep(2)

    tabela = driver.find_element(By.ID, "id-da-tabela")
    if "Laptop Gamer" in tabela.text and "5" in tabela.text and "7500.00" in tabela.text:
        print("✅ Teste de cadastro de produto: SUCESSO!")
    else:
        print("❌ Teste de cadastro de produto: FALHOU!")  

finally:
    driver.quit()