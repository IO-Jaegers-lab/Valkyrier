
class Counter:
    def __init__(self):
        self.value = 0

    def get_value(self):
        return self.value

    def set_value(self, v):
        self.value = v

    def increase(self, withValue):
        self.set_value(self.get_value() + withValue)

    def increment(self):
        self.increase(1)

    def decrease(self, withValue):
        self.set_value( self.get_value() - withValue )

    def decrement(self):
        self.decrease(1)

    def is_zero(self):
        return self.value == 0
