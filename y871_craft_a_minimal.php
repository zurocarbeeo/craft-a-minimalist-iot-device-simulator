<?php
/**
 * y871 Craft a Minimalist IoT Device Simulator
 *
 * This project simulates a minimalist IoT device that can sense temperature and humidity
 * and send data to a remote server for monitoring and analysis.
 *
 * Configuration:
 * - Temperature sensor: DS18B20
 * - Humidity sensor: DHT11
 * - Communication protocol: HTTP
 * - Remote server: http://example.com/iot/data
 *
 * Simulator functions:
 * - generateTemperatureData(): generates random temperature data between 20-30°C
 * - generateHumidityData(): generates random humidity data between 40-60%
 * - sendDataToServer(): sends simulated data to the remote server
 *
 * Example usage:
 * $simulator = new IoTDeviceSimulator();
 * $simulator->simulate();
 */

class IoTDeviceSimulator {
  private $temperatureSensor;
  private $humiditySensor;
  private $remoteServer;

  public function __construct() {
    $this->temperatureSensor = new TemperatureSensor();
    $this->humiditySensor = new HumiditySensor();
    $this->remoteServer = new RemoteServer();
  }

  public function simulate() {
    $temperatureData = $this->generateTemperatureData();
    $humidityData = $this->generateHumidityData();
    $this->sendDataToServer($temperatureData, $humidityData);
  }

  private function generateTemperatureData() {
    return rand(20, 30);
  }

  private function generateHumidityData() {
    return rand(40, 60);
  }

  private function sendDataToServer($temperatureData, $humidityData) {
    $data = array(
      'temperature' => $temperatureData,
      'humidity' => $humidityData
    );
    $this->remoteServer->sendData($data);
  }
}

class TemperatureSensor {
  // simulated temperature sensor
}

class HumiditySensor {
  // simulated humidity sensor
}

class RemoteServer {
  private $url;

  public function __construct() {
    $this->url = 'http://example.com/iot/data';
  }

  public function sendData($data) {
    // simulate sending data to remote server
    echo "Data sent to server: " . json_encode($data) . "\n";
  }
}

$simulator = new IoTDeviceSimulator();
$simulator->simulate();

?>