import qrcode
import os
import shutil
import sys
import time
import subprocess

def show_qr(data):
    os.system('cls' if os.name == 'nt' else 'clear')
    sys.stdout.write("\033[?25l")  # hide cursor
    sys.stdout.flush()

    qr = qrcode.QRCode(border=1, box_size=4)  # bigger QR
    qr.add_data(data)
    qr.make()

    cols, rows = shutil.get_terminal_size()

    from io import StringIO
    buf = StringIO()
    qr.print_ascii(out=buf, invert=True)
    lines = buf.getvalue().splitlines()

    pad_top = max((rows - len(lines)) // 2, 0)
    for _ in range(pad_top):
        print()

    for line in lines:
        pad_side = max((cols - len(line)) // 2, 0)
        print(" " * pad_side + line)

try:
    if len(sys.argv) < 2:
        print("Usage: python qr.py <text or url>")
        sys.exit(1)

    user_input = " ".join(sys.argv[1:])
    show_qr(user_input)

    time.sleep(10)  # wait 10 seconds

    os.system('cls' if os.name == 'nt' else 'clear')

    # start main.py again
    subprocess.run(["python", "main.py"])

except KeyboardInterrupt:
    pass
finally:
    sys.stdout.write("\033[?25h")  # show cursor
    sys.stdout.flush()
