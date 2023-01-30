from crawler.paths.facade \
    import Facade


class FacadeManager(object):
    def __init__(self, history):
        self.facades = []
        self.history = history

    def append(self, facade):
        if self.is_facade(facade):
            self.facades.append(facade)

    def get_facades(self):
        return self.facades

    def set_facades(self, v):
        self.facades = v

    def size(self):
        return len(self.facades)

    def is_zero(self):
        return self.size() == 0

    def run(self):
        pass

    def update(self):
        pass

    def index(self, number) -> Facade:
        return self.facades[number]

    def is_facade(self, facade):
        return issubclass(facade, Facade)

