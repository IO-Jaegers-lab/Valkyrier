from selenium \
    import webdriver

from webdriver_manager.chrome \
    import ChromeDriverManager

from selenium.webdriver.chrome.service \
    import Service \
    as ChromeService


class DriverWrapper:
    def __init__(self):
        self.user_data_dir = r'D:\tmp\automated chrome'
        self.driver = None

        self.options = None
        self.service = None

        self.headless = False
        self.implicit_wait = 4.5

        self.driver = webdriver.Chrome(service=self.get_service(), options=self.get_options())
        self.driver.minimize_window()

    def is_headless(self):
        return self.headless

    def set_headless(self, v):
        self.headless = v

    def done(self):
        self.driver.close()

    def setup_default_options(self):
        options = webdriver.ChromeOptions()
        options.add_argument('user-data-dir=' + r'D:\tmp\automated chrome')
        options.add_argument('disk-cache-size=1402880000')

        self.set_options(options)

        #
        self.__setup_headless()

        #
        return self.get_options()

    def goto(self, url):
        self.driver.get(url)

    def __setup_headless(self):
        if self.is_headless():
            self.get_options().add_argument('--headless')

    def setup_default_service(self):
        self.set_service(ChromeService(ChromeDriverManager().install()))
        return self.get_service()

    def get_service(self):
        if self.service is None:
           self.setup_default_service()

        return self.service

    def get_options(self):
        if self.options is None:
            self.setup_default_options()

        return self.options

    def sleep(self):
        self.driver.implicitly_wait(self.get_implicit_wait_value())

    def set_options(self, v):
        self.options = v

    def set_service(self, service):
        self.service = service

    def get_driver(self):
        return self.driver

    def set_driver(self, driver):
        self.driver = driver

    def get_implicit_wait_value(self):
        return self.implicit_wait

    def set_implicit_wait_value(self, v):
        self.implicit_wait = v

