from domain \
    import Domain

from keys.escape \
    import Escape

from keys.ready \
    import IsReady

import time


class Application:
    def __init__(self):
        self.listener_escape = Escape()
        self.running = True

        self.domain_area = Domain()
        self.domain_area.set_application(self)
        self.ready = IsReady()

    def initiate(self):
        print("initiate")
        pass

    def execute(self):
        print("execution")
        print("press Y to work")
        print("press ESCAPE to leave")

        while self.get_is_running():
            if self.ready.is_ready():
                self.get_domain_area().operate()
            else:
                time.sleep(1)

            if self.listener_escape.fetch_and_is_escape():
                self.flag_exit()

    def cleanup(self):
        print("cleanup")
        self.domain_area.done()

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
