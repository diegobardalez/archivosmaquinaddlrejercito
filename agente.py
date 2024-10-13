# agente.py

import requests
import re
from time import sleep
from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler

# Ruta del archivo de logs de Apache
#LOG_FILE = '/var/log/apache2/access.log'  # Cambia esta ruta si es necesario
LOG_FILE = '/home/bitnami/stack/apache2/logs'

# URL del servidor Flask
SERVER_URL = 'http://0.tcp.sa.ngrok.io:10237/alert'

# Patrón regex para detectar posibles inyecciones SQL
SQL_INJECTION_PATTERNS = [
    r"(\%27)|(\')|(\-\-)|(\%23)|(#)",  # Caracteres comunes en SQLi
    r"(\bselect\b|\binsert\b|\bdelete\b|\bupdate\b|\bdrop\b|\bunion\b)",  # Palabras clave SQL
    r"(\bOR\b|\bAND\b).*(\=|\<|\>)",  # Condiciones lógicas
    r"(\')\s*(OR|AND)\s*\d+\s*\=\s*\d+",  # ' OR 1=1
]

class LogHandler(FileSystemEventHandler):
    def __init__(self, logfile):
        self.logfile = logfile
        self.logfile.seek(0,2)  # Ir al final del archivo

    def on_modified(self, event):
        if event.src_path == self.logfile.name:
            lines = self.logfile.readlines()
            for line in lines:
                self.process_line(line)

    def process_line(self, line):
        for pattern in SQL_INJECTION_PATTERNS:
            if re.search(pattern, line, re.IGNORECASE):
                # Extraer la IP y la solicitud
                ip = line.split(' ')[0]
                alert = {
                    'ip': ip,
                    'message': 'Posible ataque de SQL Injection detectado.'
                }
                # Enviar la alerta al servidor
                try:
                    response = requests.post(SERVER_URL, json=alert)
                    if response.status_code == 200:
                        print(f"Alerta enviada: {alert}")
                    else:
                        print(f"Error al enviar la alerta: {response.status_code}")
                except Exception as e:
                    print(f"Error al conectar con el servidor: {e}")
                break  # Evitar múltiples alertas por la misma línea

def main():
    with open(LOG_FILE, 'r') as logfile:
        event_handler = LogHandler(logfile)
        observer = Observer()
        observer.schedule(event_handler, path=LOG_FILE, recursive=False)
        observer.start()
        print("Agente iniciado. Monitoreando los logs de Apache...")
        try:
            while True:
                sleep(1)
        except KeyboardInterrupt:
            observer.stop()
        observer.join()

if __name__ == '__main__':
    main()
