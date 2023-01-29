class Buffer:
    def __init__(self):
        self.buffer = []

    def get_buffer(self):
        return self.buffer

    def set_buffer(self, withSet):
        self.buffer = withSet

    def current(self):
        current = self.buffer[0]
        self.buffer.pop(0)

        return current

    def append(self, href):
        if href is str:
            self.buffer.append(href)

    def size(self):
        return len(self.buffer)

    def isEmpty(self):
        return self.size() == 0



