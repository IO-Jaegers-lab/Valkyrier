from crawler.driver_wrapper import DriverWrapper


class Facade(object):
    def __init__(self, driver):
        self.driver = driver

    def get_driver(self) -> DriverWrapper:
        return self.driver

    def set_driver(self, v: DriverWrapper):
        self.driver = v

    def execute(self):
        pass
