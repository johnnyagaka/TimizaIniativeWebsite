import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
 
import org.openqa.selenium.By;
import org.openqa.selenium.WebElement;
 
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;
 
import org.junit.Assert;
 
public class TestForm  {
  public static void main(String[] args) {
 
    // Create an instance of the driver
    WebDriver driver = new FirefoxDriver();
 
    // Navigate to a web page
    driver.get("http://cs.ashesi.edu.gh/~nkosi_mzembe/timizaInitiative/volunteer.php");
 
    // Perform actions on HTML elements, entering text and submitting the form
    WebElement fnameElement     = driver.findElement(By.name("fname"));
    WebElement lnameElement     = driver.findElement(By.name("lname"));
    WebElement emailElement     = driver.findElement(By.name("email"));
    WebElement phoneElement     = driver.findElement(By.name("phone"));
    WebElement formElement        = driver.findElement(By.id("volunteer"));
 
    fnameElement.sendKeys("Johanne");
    lnameElement.sendKeys("Smith");
    emailElement.sendKeys("jo@gmail.com");
    phoneElement.sendKeys(0775283075);
 
    //emailElement.submit(); // submit by text input element
    formElement.submit();        // submit by form element
 
 
    // Anticipate web browser response, with an explicit wait
    WebDriverWait wait = new WebDriverWait(driver, 10);
    WebElement messageElement = wait.until(
           ExpectedConditions.presenceOfElementLocated(By.id("volunteer"))
            );
 
    // Run a test
    String message                 = messageElement.getText();
    String successMsg             = "Registration Successful!.";
    Assert.assertEquals (message, successMsg);
 
    // Conclude a test
    driver.quit();
 
  }
}