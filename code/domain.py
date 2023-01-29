from crawler.crawler \
    import Crawler


class Domain:
    def __init__(self):
        self.application = None
        self.crawler = Crawler()

    def set_application(self, withApp):
        self.application = withApp

    def get_application(self):
        return self.application

    def get_crawler(self):
        return self.crawler

    def set_crawler(self, withValue):
        self.crawler = withValue

    def operate(self):
        pass

