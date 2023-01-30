from crawler.paths.facade \
    import Facade

from selenium.webdriver.common.by import By


class LinkTag(Facade):
    def __init__(self, driver, class_name):
        super().__init__(driver)
        self.by_class = class_name

    def get_by_class(self) -> str:
        return self.by_class

    def set_by_class(self, v: str):
        self.by_class = v

    def execute(self):
        print("LinkTag execute:")
        r = []
        driver = self.get_driver().get_driver()

        elements = driver.find_elements(By.CLASS_NAME, self.get_by_class())

        for e in elements:
            href = e.get_attribute('href')
            r.append(href)

        return r
