import msvcrt


class Escape:
    def __init__(self):
        pass

    def waiting_for_keypress(self):
        if msvcrt.kbhit():
            return True
        return False

    def fetch_and_is_escape(self):
        if self.waiting_for_keypress():
            return msvcrt.getch().decode() == chr(27)