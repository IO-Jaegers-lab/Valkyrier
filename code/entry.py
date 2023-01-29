from application \
    import Application


def main():
    app = Application()
    app.initiate()
    app.execute()
    app.cleanup()


if __name__ == '__main__':
    main()