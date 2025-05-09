
// Facade funtion to check if the hero is colliding with the wall
bool isColliding(Hero &h){
    if(h.x + h.width > 800 || h.x < 0){
        return true;
    }
    return false;
}

void animate(Hero &h){
    // Animation logic here
    h.state = "running";
    sleep(1);
    h.state = "idle";
}

//Facade function to move the hero
void move(Hero &h){
    if(!isColliding(h)){
        h.x += 5;
        animate(h);
    }
}

int main() {
    Hero hero;

    move(hero);

    return 0;
}