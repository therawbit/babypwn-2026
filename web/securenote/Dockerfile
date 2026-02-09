FROM eclipse-temurin:17-jre
WORKDIR /app

# Copy your prebuilt jar
COPY myapp.jar app.jar

EXPOSE 8080

ENTRYPOINT ["java", "-jar", "app.jar"]

