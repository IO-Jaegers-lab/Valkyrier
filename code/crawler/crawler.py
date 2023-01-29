from crawler.driver_wrapper \
    import DriverWrapper

from crawler.lists.history \
    import History

from crawler.lists.temperary.buffer \
    import Buffer


class Crawler:
    def __init__(self):
        self.wrapper = DriverWrapper()
        self.buffer = Buffer()
        self.history = History()

    def insert(self, href):
        self.buffer.append(href)

    def load(self):
        current = self.buffer.current()
        self.wrapper.goto(current)

        self.wrapper.sleep()

    def isDone(self):
        return self.buffer.is_empty()

    def done(self):
        self.wrapper.done()
