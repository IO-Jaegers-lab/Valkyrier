from crawler.crawler \
    import Crawler

from loader \
    import Loader

import time


class Domain:
    def __init__(self):
        self.application = None

        self.crawler = Crawler()

        self.loader = Loader(self.get_crawler())
        self.loader.load()

    def operate(self):
        if not self.crawler.isDone():
            self.process()
        else:
            self.application.flag_exit()

    def process(self):
        self.crawler.load()
        time.sleep(1.5)

    def done(self):
        self.crawler.done()

    def set_application(self, withApp):
        self.application = withApp

    def get_application(self):
        return self.application

    def get_crawler(self):
        return self.crawler

    def set_crawler(self, withValue):
        self.crawler = withValue
