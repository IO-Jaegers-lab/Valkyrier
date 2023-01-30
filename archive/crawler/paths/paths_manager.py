from crawler.paths.facade_manager \
    import FacadeManager


class PathManager(FacadeManager):
    def __init__(self, history):
        super().__init__(history)

    def run(self):
        for idx in range(0, self.size()):
            current = self.index(idx)

            f = current.execute()
            print("found: " + str(f))

    def update(self):
        pass








