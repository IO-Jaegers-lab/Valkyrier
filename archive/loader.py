import os
from crawler.crawler import Crawler


def get_directory():
    currentDirectory = os.getcwd()
    workspace = os.path.abspath(os.path.join(currentDirectory, os.pardir))

    return workspace


def load_files(path_to):
    array_to_return = []
    files = os.listdir(path_to)

    for f in files:
        full_dir = os.path.join(path_to, f)

        if os.path.isfile(full_dir):
            if not f == '.gitignore':
                array_to_return.append(full_dir)

    return array_to_return


class Loader:
    def __init__(self, crawler):
        self.path = os.path.join(\
            get_directory(),\
            os.path.basename( r"/data") \
        )

        self.crawler = crawler

        print("found working directory:" + self.path)

    def load(self):
        loadFiles = load_files(self.path)

        for e in loadFiles:
            self.open_file(e)

    def open_file(self, path):
        f = open(path, "r")

        for rl in f.readlines():
            if len(rl) >= 1 and not rl.isspace():
                self.link(rl)

        f.close()

    def link(self, path):
        self.get_crawler().insert(path)

    def get_crawler(self):
        if isinstance(self.crawler, Crawler):
            return self.crawler
        else:
            return None

    def set_crawler(self, crawler):
        self.crawler = crawler


























