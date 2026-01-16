
<?php

// 1️⃣ State Interface
interface TrafficLightState {
    public function next(TrafficLight $light);
    public function getColor(): string;
}

// 2️⃣ Concrete States
class RedState implements TrafficLightState {
    public function next(TrafficLight $light) {
        $light->setState(new GreenState());
    }

    public function getColor(): string {
        return "RED - Stop";
    }
}

class GreenState implements TrafficLightState {
    public function next(TrafficLight $light) {
        $light->setState(new YellowState());
    }

    public function getColor(): string {
        return "GREEN - Go";
    }
}

class YellowState implements TrafficLightState {
    public function next(TrafficLight $light) {
        $light->setState(new RedState());
    }

    public function getColor(): string {
        return "YELLOW - Slow Down";
    }
}

// 3️⃣ Context Class
class TrafficLight {
    private TrafficLightState $state;

    public function __construct() {
        $this->state = new RedState(); // Initial state
    }

    public function setState(TrafficLightState $state) {
        $this->state = $state;
    }

    public function next() {
        $this->state->next($this);
    }

    public function getState(): string {
        return $this->state->getColor();
    }
}

// 4️⃣ Client Code
$trafficLight = new TrafficLight();

for ($i = 0; $i < 6; $i++) {
    echo $trafficLight->getState() . "<br>";
    $trafficLight->next();
}
