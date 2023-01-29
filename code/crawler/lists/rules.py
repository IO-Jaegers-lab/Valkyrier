from crawler.lists.blacklist \
    import Blacklist

from crawler.lists.whitelist \
    import Whitelist


class Rules:
    def __init__(self):
        self.blacklist = Blacklist()
        self.whitelist = Whitelist()

