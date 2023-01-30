class History:
    def __init__(self):
        self.list = []

        self.tree = {}

    def insert_last_url(self, url):
        self.list.append(url)

        self.routine()

    def routine(self):
        if self.size() % 50 == 0:
            self.routine_status()
            self.list.sort()

    def is_in_history(self, url):
        for idx in range(0, len(self.list)):
            current = self.list[idx]

            if url == current:
                print("hit")
                return True

        return False

    def size(self):
        return len(self.list)

    def routine_status(self):
        print(self.list)
