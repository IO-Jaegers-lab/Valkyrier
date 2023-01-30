import msvcrt


class IsReady:
    def __init__(self):
        self.state = False

    def waiting_for_keypress(self):
        if msvcrt.kbhit():
            return True
        return False

    def fetch_and_is_escape(self):
        if self.waiting_for_keypress():
            return msvcrt.getch().decode() == chr(ord('Y'))

    def is_ready(self):
        if self.fetch_and_is_escape():
            self.set_state(True)

        return self.state

    def get_state(self):
        return bool(self.state)

    def set_state(self, value):
        self.state = bool(value)


