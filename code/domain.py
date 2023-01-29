from crawler.crawler \
    import Crawler

from loader \
    import Loader


class Domain:
    def __init__(self):
        self.application = None

        self.crawler = Crawler()

        self.loader = Loader(self.get_crawler())
        self.loader.load()

    def operate(self):

        pass

    def set_application(self, withApp):
        self.application = withApp

    def get_application(self):
        return self.application

    def get_crawler(self):
        return self.crawler

    def set_crawler(self, withValue):
        self.crawler = withValue
