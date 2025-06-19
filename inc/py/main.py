import requests
import time
import subprocess

def get_ngrok_url():
    try:
        res = requests.get("http://127.0.0.1:4040/api/tunnels")
        res.raise_for_status()
        tunnels = res.json().get("tunnels", [])
        for tunnel in tunnels:
            if tunnel["proto"] in ("http", "https"):
                return tunnel["public_url"]
    except:
        return None

url = None

# Wait for URL with 2 sec interval
while url is None:
    url = get_ngrok_url()
    if url is None:
        print("No HTTP tunnel found, retrying in 2 seconds...")
        time.sleep(2)

# Run qr.py with URL immediately
subprocess.run(["python", "qr.py", url])

# Then keep running qr.py every 30 seconds with same URL
while True:
    time.sleep(30)
    subprocess.run(["python", "qr.py", url])
