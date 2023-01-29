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

    def insert( self, href ):
        if not str( href ).isspace():
            self.buffer.append( href )

