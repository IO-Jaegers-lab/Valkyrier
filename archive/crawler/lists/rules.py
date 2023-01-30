from crawler.lists.blacklist \
    import Blacklist

from crawler.lists.whitelist \
    import Whitelist


class Rules:
    def __init__(self):
        self.blacklist = Blacklist()
        self.whitelist = Whitelist()

    def get_blacklist(self):
        return self.blacklist

    def set_blacklist(self, v):
        self.blacklist = v

    def get_whitelist(self):
        return self.whitelist

    def set_whitelist(self, v):
        self.whitelist = v
