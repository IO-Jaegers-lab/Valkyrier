from domain \
    import Domain

from escape \
    import Escape


class Application:
    def __init__(self):
        self.listener_escape = Escape()
        self.running = True

        self.domain_area = Domain()
        self.domain_area.set_application(self)

    def initiate(self):
        pass

    def execute(self):
        while self.get_is_running():
            self.get_domain_area().operate()

            if self.listener_escape.fetch_and_is_escape():
                self.flag_exit()

    def cleanup(self):
        pass

    def flag_exit(self):
        self.set_is_running(False)

    def get_domain_area(self):
        return self.domain_area

    def set_domains_area(self, withDomain):
        self.domain_area = withDomain

    def get_is_running(self):
        return self.running

    def set_is_running(self, withState):
        self.running = withState
