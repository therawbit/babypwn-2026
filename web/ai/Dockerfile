# Use the official Ollama image as the base
FROM ollama/ollama:latest

# Install Python, pip, and curl for the web app and health checks
RUN apt-get update && apt-get install -y \
  python3 \
  python3-pip \
  curl \
  && rm -rf /var/lib/apt/lists/*

WORKDIR /app

# Copy and install Python dependencies
# --break-system-packages is required for newer Debian-based images
COPY requirements.txt .
RUN pip3 install --no-cache-dir -r requirements.txt --break-system-packages

# Copy your Flask app code
COPY . .

# PRE-PULL THE MODEL:
# This runs during 'docker build'. It ensures the model is already in the image.
RUN (ollama serve &) && sleep 10 && ollama pull smollm2:135m

# Make the startup script executable
RUN chmod +x entrypoint.sh

# ONLY expose port 5000 (Ollama's 11434 stays hidden inside)
EXPOSE 5000

# Use the entrypoint script to manage the low-resource environment
ENTRYPOINT ["./entrypoint.sh"]
